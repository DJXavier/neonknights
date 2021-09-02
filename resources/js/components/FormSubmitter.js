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
    .then(function (respnse) {
        alert('HELLO');
    }).catch(function (error) {
        
    });
}

if (document.getElementById('game-form')) {
    let gameForm = document.getElementById('game-form');
    gameForm.addEventListener('submit', GameForm);
}