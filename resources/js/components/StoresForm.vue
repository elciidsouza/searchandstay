<template>
    <div class="card">
        <div class="card-header">Editing store</div>

        <div class="card-body">
            <div class="alert alert-danger" role="alert" v-if="showAlertRequired">
                Inputs Name and Address is required!
            </div>

            <form @submit.prevent="submitStore">
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name" v-model="name">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" id="address" v-model="address">
                </div>

                <div class="form-group mt-1">
                    <input type="checkbox" id="checkbox" v-model="active" />
                    <label for="checkbox">Active?</label>
                </div>

                <div class="form-group mt-1">
                    <label>Books</label>
                    <select class="form-control" v-model="booksSelected" multiple>
                        <option v-for="book in books" :value="book.id">
                            {{ book.name }}
                        </option>
                    </select>
                </div>

                <a type="button" class="btn btn-primary mt-4" href="/stores/index">Back</a>
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
            address: '',
            active: 1,
            showAlertRequired: false,
            books: [],
            booksSelected: [],
        };
    },
    mounted() {
        if(this.id != undefined){
            this.getStore();
        }
        this.getBooks();
    },
    methods: {
        getStore()
        {
            axios.get('/api/stores/find/' + this.id)
                .then(response => {
                    this.name = response.data.name;
                    this.address = response.data.address;
                    this.active = response.data.active;
                    this.booksSelected = response.data.books_selected.map(book => book.book_id);
                    console.log(this.booksSelected);
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                });
        },
        getBooks()
        {
            axios.get('/api/books')
                .then(response => {
                    this.books = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        submitStore()
        {
            if(this.name == undefined || this.name == '' || this.address == undefined || this.address == ''){
                this.showAlertRequired = true;
                return;
            }

            if(this.id != undefined){
                this.updateStore();
            } else {
                this.storeStore();
            }
        },
        storeStore()
        {
            axios.post('/api/stores/store/', {
                name: this.name,
                address: this.address,
                active: this.active,
                booksSelected: this.booksSelected,
            })
                .then(response => {
                    window.location.href = '/stores/index';
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                });
        },
        updateStore()
        {
            axios.put('/api/stores/update', {
                id: this.id,
                name: this.name,
                address: this.address,
                active: this.active,
                booksSelected: this.booksSelected,
            })
                .then(response => {
                    window.location.href = '/stores/index';
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
