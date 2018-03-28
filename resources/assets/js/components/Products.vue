<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Test products</div>

                    <div class="card-body">

                        <div v-for="product in products" class="element element-in">
                            <h3><a href=""> {{location}} {{product.name}}</a></h3>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getProducts();
        },
        data() {
            return {
                products: [],
                location_a: location
            }
        },
        methods: {
            getProducts() {
                axios.get('ajax/products').then((res) => {

                    this.products = res.data;
                    console.log(this.location_a);
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>
