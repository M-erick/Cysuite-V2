<template>
    <!-- DevEric -->
    <select v-if="!isIssueClosed" @change="(event) => rateResponse(event.target.value, responseId)">
        <option disabled value="">
            Rate the Response
        </option>
        <option v-for="n in 5" :key="n" :value="n">
            {{ n }}
        </option>
    </select>
</template>

<script setup>
import axios from 'axios';
import { ref, computed } from 'vue';
import { usePage } from "@inertiajs/vue3";
import { useStore } from 'vuex';

const store = useStore();
const { props } = usePage();
const currentUser = props.auth.user;

const responses = computed(() => store.state.issues.responses);


const { isIssueClosed, responseId } = defineProps({
    isIssueClosed: {
        required: true,
    },
    responseId: {
        required: true,
    },

});

const rateResponse = async (rating, responseId) => {
    const response = responses.value.find(resp => resp.id === responseId);
    if (!response) {
        console.error('Response not found');
        return;
    }

    try {
        await axios.post(`/api/ratings`, {
            user_id: currentUser.id,
            rated_user_id: response.user_id,
            rating: rating,
        });
        // find proper way for error handling:
    } catch (error) {
        console.error('Error rating response:', error);
    }
};

</script>

<style></style>
