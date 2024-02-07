<script setup>
import {useForm, usePage} from '@inertiajs/vue3';

const form = useForm({
    body: '',
    post_id: ''
});
const page = usePage();

const props = defineProps({
    post_id: Number,
    user_id: Number,
    
});

const postComment = () => {
    form.post(route("posts.comments.store", props.post_id), {
        onSuccess: () => {
            console.log("Comment posted");
            form.reset();
        },
        onError: () => {
            console.log(form.errors);
        }
    })
}

</script>

<template>
    <div>
        <form @submit.prevent="postComment" >
            <button v-if="user_id == page.props.auth.user.id" @click="toggleEdit">Edit</button>
            <div class="flex flex-col border rounded-md mt-2 px-2 min-w-[500px]">
                <textarea v-model="form.body" name="postComment" id="postComment" cols="30" rows="4" class=" border-none rounded-md mt-2"></textarea>
                <button class=" rounded-md mt-2 text-white border self-center w-1/4 mb-2">Comment</button>
            </div>
            <button @click="update" v-if="editMode" class="border border-white rounded-md mt-1">Save Changes</button>
            <button v-if="user_id == page.props.auth.user.id" class="border border-white rounded-md mt-1" @click="deletePost">Delete</button>
        </form>
    </div>
</template>
