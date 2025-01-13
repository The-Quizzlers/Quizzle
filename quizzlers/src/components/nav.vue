<template>
    <nav>
        <div class="bg-white text-black p-4 flex justify-between">
            <div class="flex items-center space-x-8 mx-auto">
            <a class="text-black no-underline hover:underline" href="#">
                Create
            </a>
            <a class="text-black no-underline hover:underline" href="#">
                Forums
            </a>
            <a class="text-black no-underline hover:underline" href="#">
                Random Quiz
            </a>
            </div>
            <div class="flex items-center space-x-4">
            <button class="text-black no-underline hover:underline">
                <router-link to="/register">Register</router-link>
            </button>
            <button class="text-black no-underline hover:underline">
                <router-link to="/login">Log in</router-link>
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