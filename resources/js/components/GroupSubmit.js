import axios from "axios";

function GroupSubmit(event) {
    document.getElementById("group-submit-button").disabled = true
    event.preventDefault();
    let test = document.querySelector('#group-create-form');
    new FormData(test);
}

function GroupFormData(form) {
    let data = form.formData;
    let entry = [];
    for (var pair of data.entries()) {
        entry[pair[0]] = pair[1];
    }

    axios.post('api/game', {
        name: entry['name'],
        type: entry['type'],
        noPlayers: entry['noPlayers'],
    })
    .then((res) => createForum(res.data['redirectPath'], entry['name']))
    .catch((err) => {
        document.getElementById("group-submit-button").disabled = true;
        console.log(err)
    });
}

function createForum(redirect, gameName) {
    let forumTitle = ("Forum For " + gameName);
    axios.post('api/category/autogen', {
        title: forumTitle,
        description: 'Forum for your gaming group.',
        color: '#007bff',
        accepts_threads: true,
        is_private: true,
    })
    .then((res) => window.location.href = redirect)
    .catch((err) => {
        document.getElementById("group-submit-button").disabled = true;
        console.log(err)
    });
}

export default GroupSubmit;

if (document.getElementById('group-create-form')) {
    document.getElementById('group-create-form').addEventListener('submit', (event) => GroupSubmit(event));
    document.getElementById('group-create-form').onformdata = (form) => GroupFormData(form);
}
