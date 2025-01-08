<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h2>{{ title }}</h2>
                <p>ID: {{ id }}</p>
                <p>Category: {{ category }}</p>
            </div>
            <div class="card-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        },
        id: {
            type: [String, Number],
            required: true
        },
        category: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>
.card {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 300px;
    height: 200px;
}
.card-header {
    border-bottom: 1px solid #eee;
    padding-bottom: 8px;
    margin-bottom: 16px;
}
</style>