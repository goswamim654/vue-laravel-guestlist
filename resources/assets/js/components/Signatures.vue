<template>
  <div>
    <div class="card bg-light mt-4" v-for="signature in signatures">
      <div class="card-header">
        <span class="fas fa-user" id="start"></span>
        <label id="started">By</label> {{ signature.name }}
      </div>
      <div class="card-body">
        <div class="row">
        	<div class="col-md-2">
	          <div class="thumbnail">
	            <img :src="signature.avatar" :alt="signature.name">
	          </div>
	        </div>
	        <p class="col-md-8">{{ signature.body }}</p>
        </div>
      </div>
      <div class="card-footer">
        <span class="fas fa-calendar" id="visit"></span> {{ signature.date }} |
        <span class="fas fa-flag" id="comment"></span>
        <a href="#" id="comments" class="card-link" @click="report(signature.id)">Report</a>
      </div>
    </div>
    <paginate
      :page-count="pageCount"
      :click-handler="fetch"
      :prev-text="'Prev'"
      :next-text="'Next'"
      :container-class="'pagination'">
    </paginate>
  </div>
</template>

<script>
    export default {

        data() {
            return {
                signatures: [],
                pageCount: 1,
                endpoint: 'api/signatures?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.signatures = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },

            report(id) {
                if(confirm('Are you sure you want to report this signature?')) {
                    axios.put('api/signatures/'+id+'/report')
                    .then(response => this.removeSignature(id));
                }
            },

            removeSignature(id) {
                this.signatures = _.remove(this.signatures, function (signature) {
                    return signature.id !== id;
                });
            }
        }
    }
</script>