

var rootURLFighters = "http://localhost:4006/TekkenApp/api/fighters";
var rootURLUsers = "http://localhost:4006/TekkenApp/api/users";


var renderListFighters = function(data)
{
    var totalCount = 0;
    var totalFemaleCount = 0;
    var totalMaleCount = 0;
    var unknownAges = 0;
    list=data.fighters;
    console.log('list fighters');
    $.each(list, function(index, fighter)
    {
        if(fighter.gender==='F')
        {
            totalFemaleCount++;
        }
        else if(fighter.gender==='M')
        {
            totalMaleCount++;
        }
        
        if(fighter.age==='Unknown')
        {
            unknownAges++;
        }
        totalCount++;
        $('#table_body_fighters').append('<tr><td>'+fighter.name+'</td><td>'+fighter.play_style+'</td><td>'+fighter.age+'</td><td><input type="button" value="Edit" onClick="editFighter()"/></td><td><input type="button" value="Delete" onClick="deleteFighter()"/></td></tr>');
    });
    $('#total_number_fighters').append(totalCount);
    $('#total_number_fighters_female').append(totalFemaleCount);
    $('#total_number_fighters_male').append(totalMaleCount);
    $('#unknown_ages').append(unknownAges);
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

function createFighter()
{
    $('#createFighter').modal('show');
}

function findAllFighters()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLFighters,
        dataType: "json",
        success: renderListFighters
    });
};

function findAllUsers()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLUsers,
        dataType: "json",
        success: renderListUsers
    });
};


$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  findAllFighters();
  findAllUsers();
});















