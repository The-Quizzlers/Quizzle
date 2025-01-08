<template>
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                Quizzle
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <button class="mt-4 px-4 py-2">
                    <router-link to="/creation">creation</router-link>    
                </button>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'NavBar'
}
</script>

<style scoped>
.navbar {
    background-color: #333;
    color: white;
    padding: 1rem;
}

.navbar-item {
    color: white;
    margin-right: 1rem;
    text-decoration: none;
}

.navbar-item:hover {
    text-decoration: underline;
}
</style>