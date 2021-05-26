@extends('layouts.app')
<style>
    table, th, td {
        border: 1px solid black;
    }
    table {
        width: 80%;
        border-collapse: collapse;
    }
    .pageContent {
        padding-left: 30px;
    }
</style>
<title>Display Characters</title>

@section('content')

    <div class="pageContent">
        <h1>
            Characters
        </h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Pronouns</th>
                <th>Strength</th>
                <th>Dexterity</th>
                <th>Constitution</th>
                <th>Max Stamina</th>
                <th>Level</th>
                <th>Dex Trained</th>
                <th>Training Points</th>
            </tr>
            <tr>
                <td>Person</td>
                <td>He/Him</td>
                <td>13</td>
                <td>9</td>
                <td>14</td>
                <td>27</td>
                <td>1</td>
                <td>1</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Someone</td>
                <td>They/Them</td>
                <td>14</td>
                <td>10</td>
                <td>12</td>
                <td>26</td>
                <td>1</td>
                <td>2</td>
                <td>4</td>
            </tr>
        </table>
    </div>

@endsection