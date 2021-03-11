import './bootstrap'
import Vue from 'vue'
import PostLike from './components/PostLike'
import PostTagsInput from './components/PostTagsInput'
import FollowButton from './components/FollowButton'

// require('./chat');

const app = new Vue({
    el: '#app',
    components: {
        PostLike,
        PostTagsInput,
        FollowButton,
    }
})
