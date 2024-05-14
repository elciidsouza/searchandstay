<template>
    <div class="card">
        <div class="card-header">Listing of books</div>

        <div class="card-body">
            <div class="align-content-end">
                <a class="btn btn-primary" href="/books/create">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>ISBN</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{ book.name }}</td>
                    <td>{{ book.isbn }}</td>
                    <td>{{ book.value }}</td>
                    <td>
                        <a :href="'/books/edit/' + book.id">
                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                        </a>
                        <a href="#" @click="deleteBook(book.id)">
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
            books: [],
        };
    },
    mounted() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios.get('/api/books')
                .then(response => {
                    this.books = response.data;
                })
                .catch(error => {
                    this.$toastr.e(
                        error,
                    );
                });
        },
        deleteBook(id)
        {
            axios.delete('/api/books/delete/' + id)
                .then(response => {
                    this.getBooks();
                    this.$toastr.s(
                        "Book successfully deleted!",
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
