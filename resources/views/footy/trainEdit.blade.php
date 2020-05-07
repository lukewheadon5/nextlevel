@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

<li style="float:left; padding-left:5px; padding-top:5px;">
  @if(empty($team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('playIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
        <div class="col-md-4">
            <h3 class="text-left pl-2">
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}/training"  tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
            </h3>
        </div>
		<div class="col-md-4">
			<h3 class="text-center">
				<u>{{$team->name}} Vs {{$game->opponent}}</u>
                <h3 class="text-center">
                <u>Training {{$game->season->year}}</u>
                </h3>
			</h3>
		</div>
        <div class="col-md-4">
        </div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Goals
			</h4>
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Goals</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->goals}}</td>
            <td>
            <?php echo '<textarea id="gol'.$ust->id.'" name="goals"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->goals.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="goals" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Assists
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Assists</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->assists}}</td>
            <td>
            <?php echo '<textarea id="ass'.$ust->id.'" name="assists"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->assists.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="assists" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Shots
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Shots</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->shots}}</td>
            <td>
            <?php echo '<textarea id="sho'.$ust->id.'" name="shots" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->shots.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="shots" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Shots on Target
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Shots OT</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->shotOT}}</td>
            <td>
            <?php echo '<textarea id="sot'.$ust->id.'" name="shotOT"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->shotOT.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="shotOT" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passes
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Passes</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                <td>{{$ust->passes}}</td>
                <td>
            <?php echo '<textarea id="pas'.$ust->id.'" name="passes"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->passes.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="passes" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
        </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Crosses
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Crosses</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                <td>{{$ust->crosses}}</td>
                <td>
            <?php echo '<textarea id="cro'.$ust->id.'" name="crosses"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->crosses.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="crosses" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
        </table> 

	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
        <h4>
				Successful Dribbles
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Dribbles</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->dribbles}}</td>
                    <td>
                    <?php echo '<textarea id="dri'.$ust->id.'" name="dribbles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->dribbles.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="dribbles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
		<div class="col-md-4">
        <h4>
				Tackles
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Tackles</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->tackles}}</td>
                    <td>
                    <?php echo '<textarea id="tac'.$ust->id.'" name="tackles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->tackles.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="tackles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
		<div class="col-md-4">
        <h4>
				Interceptions
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Interceptions</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->interceptions}}</td>
                    <td>
                    <?php echo '<textarea id="int'.$ust->id.'" name="interceptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->interceptions.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="interceptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Clearances
			</h4>
            
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Clearances</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->clearances}}</td>
            <td>
            <?php echo '<textarea id="cle'.$ust->id.'" name="clearances"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->clearances.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="clearances" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Headers Won
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Headers</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->headers}}</td>
                    <td>
                    <?php echo '<textarea id="hea'.$ust->id.'" name="headers"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->headers.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="headers" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach

                </tbody>
            </table> 
		</div>
		<div class="col-md-4">
			<h4>
				Saves
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Saves</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->saves}}</td>
                    <td>
                    <?php echo '<textarea id="sav'.$ust->id.'" name="saves"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->saves.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="saves" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Fouls
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Fouls</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usertrainings as $ust)
                    <tr>
                    <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                    <td>{{$ust->penalties}}</td>
                    <td>
                    <?php echo '<textarea id="pen'.$ust->id.'" name="penalties"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->penalties.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$ust->id.'" name="penalties" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
		</div>
		<div class="col-md-4">
		</div>

		<div class="col-md-4">
		</div>
	</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
var game = <?php echo json_encode($game->id); ?>;
var team = <?php echo json_encode($game->team->id); ?>;


function updateStat(utid,type){


    if(type == "goals"){
        var amount = document.getElementById("gol"+utid).value;
    }else if(type == "assists"){
        var amount = document.getElementById("ass"+utid).value;
    }else if(type == "shots"){
        var amount = document.getElementById("sho"+utid).value;
    }else if(type == "shotOT"){
        var amount = document.getElementById("sot"+utid).value;
    }else if(type == "passes"){
        var amount = document.getElementById("pas"+utid).value;
    }else if(type == "crosses"){
        var amount = document.getElementById("cro"+utid).value;
    }else if(type == "dribbles"){
        var amount = document.getElementById("dri"+utid).value;
    }else if(type == "tackles"){
        var amount = document.getElementById("tac"+utid).value;
    }else if(type == "clearances"){
        var amount = document.getElementById("cle"+utid).value;
    }else if(type == "interceptions"){
        var amount = document.getElementById("int"+utid).value;
    }else if(type == "saves"){
        var amount = document.getElementById("sav"+utid).value;
    }else if(type == "headers"){
        var amount = document.getElementById("hea"+utid).value;
    }else if(type == "penalties"){
        var amount = document.getElementById("pen"+utid).value;
    }

    console.log(amount);

    $.ajax({
        type: 'POST', 
            url: '/game/player/train/update',
            data: {"_token": "{{ csrf_token() }}", "type":type, "utid":utid, "amount":amount},
            success: function (data) {
                alert("Successfully updated player stat")
                window.location = '/statstic/game/'+game+'/update/train';
            },
            error:function(data){ 
                console.log(data);
                alert("Something went wrong.");
            }
            
    });

};

</script>

@endsection