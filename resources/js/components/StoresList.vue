<template>
    <div class="card">
        <div class="card-header">Listing of books</div>

        <div class="card-body">
            <div class="align-content-end">
                <a class="btn btn-primary" href="/stores/create">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>ISBN</th>
                    <th>Active?</th>
                    <th>Books</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="store in stores" :key="store.id">
                    <td>{{ store.name }}</td>
                    <td>{{ store.address }}</td>
                    <td>{{ store.active ? 'Yes' : 'No' }}</td>
                    <td>
                        <span v-for="book in store.books">
                            {{ book.name }}
                        </span>
                    </td>
                    <td>
                        <a :href="'/stores/edit/' + store.id">
                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                        </a>
                        <a href="#" @click="deleteStore(store.id)">
                            <i class="fa-solid fa-trash-can text-danger"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            stores: [],
        };
    },
    mounted() {
        this.getStores();
    },
    methods: {
        getStores() {
            axios.get('/api/stores')
                .then(response => {
                    this.stores = response.data;
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                });
        },
        deleteStore(id) {
            axios.delete('/api/stores/delete/' + id)
                .then(response => {
                    this.getStores();
                    this.$toastr.e(
                        "Store successfully deleted!",
                    );
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                })
        }
    }
}
</script>
