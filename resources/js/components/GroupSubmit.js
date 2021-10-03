import axios from "axios";

function GroupSubmit(event) {
    event.preventDefault();
    axios.post('forum/api/category', {
        title: 'TEST',
        description: 'TAST',
        color: 'TRY AGAIN',
        accepts_threads: true,
        is_private: true,
    })
    .then((res) => console.log(res))
    .catch((err) => console.log(err));
}

export default GroupSubmit;

if (document.getElementById('group-create-form')) {
    document.getElementById('group-create-form').addEventListener('submit', (event) => GroupSubmit(event));
}
