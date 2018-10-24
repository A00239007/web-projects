

var rootURLFighters = "http://localhost/TekkenApp/api/fighters";
var rootURLUsers = "http://localhost/TekkenApp/api/users";


var renderListFighters = function(data)
{
    list=data.fighters;
    console.log('list fighters');
    $.each(list, function(index, fighter)
    {
        $('#table_body_fighters').append('<tr><td>'+fighter.name+'</td><td>'+fighter.play_style+'</td><td>'+fighter.age+'</td></tr>');
    });
    $('#table_id_fighters').DataTable();
};

var renderListUsers = function(data)
{
    list=data.users;
    console.log('list users');
    $.each(list, function(index, user)
    {
        $('#table_body_users').append('<tr><td>'+user.name+'</td><td>'+user.email+'</td></tr>');
    });
    $('#table_id_users').DataTable();
};

function findAllFighters()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLFighters,
        dataType: "json",
        success: renderListFighters,
        error: console.log('fail')
    });
};

function findAllUsers()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLUsers,
        dataType: "json",
        success: renderListUsers,
        error: console.log('fail')
    });
};


$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  findAllFighters();
  findAllUsers();
});















