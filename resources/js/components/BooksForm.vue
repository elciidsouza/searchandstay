<template>
    <div class="card">
        <div class="card-header">Editing book</div>

        <div class="card-body">
            <div class="alert alert-danger" role="alert" v-if="showAlertNameRequired">
                Input name is required!
            </div>

            <form @submit.prevent="submitBook">
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name" v-model="name">
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input class="form-control" type="number" id="isbn" v-model="isbn">
                </div>

                <div class="form-group">
                    <label for="value">Value</label>
                    <money class="form-control" v-model="value" v-bind="money"></money>
                </div>

                <a type="button" class="btn btn-primary mt-4" href="/books/index">Back</a>
                <button type="submit" class="btn btn-success mt-4">
                    <i class="fas fa-plus"></i> Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            name: '',
            isbn: '',
            value: '',
            showAlertNameRequired: false,
            money: {
                decimal: '.',
                thousands: '',
                precision: 2,
                masked: false
            }
        };
    },
    mounted() {
        this.getBook();
    },
    methods: {
        getBook()
        {
            axios.get('/api/books/find/' + this.id)
                .then(response => {
                    this.name = response.data.name;
                    this.isbn = response.data.isbn;
                    this.value = response.data.value;
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                });
        },
        submitBook()
        {
            if(this.name == undefined || this.name == ''){
                this.showAlertNameRequired = true;
                return;
            }

            if(this.id != undefined){
                this.updateBook();
            } else {
                this.storeBook();
            }
        },
        storeBook()
        {
            axios.post('/api/books/store/', {
                name: this.name,
                isbn: this.isbn,
                value: this.value

            })
            .then(response => {
                window.location.href = '/books/index';
            })
            .catch(error => {
                this.$toastr.e(
                    error,
                );
            });
        },
        updateBook()
        {
            axios.put('/api/books/update', {
                id: this.id,
                name: this.name,
                isbn: this.isbn,
                value: this.value
            })
            .then(response => {
                window.location.href = '/books/index';
            })
            .catch(error => {
                this.$toastr.e(
                    error,
                );
            });
        }
    }
}
</script>
