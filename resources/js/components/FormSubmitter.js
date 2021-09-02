import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';

function GameForm(event) {
    event.preventDefault();
    let form = event.target;

    axios.post('api/game/store', {
        name: form.elements['name'].value,
        type: form.elements['type'].value,
        noPlayers: form.elements['noPlayers'].value
    })
    .then(function (response) {
        alert('HELLO');
        console.log(response.data['route']);
        window.location.href = response.data['route'];
    }).catch(function (error) {
        
    });
}

if (document.getElementById('game-form')) {
    let gameForm = document.getElementById('game-form');
    gameForm.addEventListener('submit', GameForm);
}