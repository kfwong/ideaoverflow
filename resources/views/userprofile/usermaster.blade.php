<div>
    @if (Storage::disk('public')->exists("img/avatars/avatar_$user->id.jpg")) 
	    {{  Html::image(Storage::url("img/avatars/avatar_$user->id.jpg") ,'profile' ,array('width'=>200, 'height'=>200))  }}

    @else 
        {{  Html::image('img/doge-profile.jpg','profile',array('width'=>200, 'height'=>200))  }}

    @endif 

</div>

<div>

	<h3>{{$user->name}}</h3>

	<a href="/users/{{$user->id}}" id="username"><p>{{"@".$user->username}}</p></a>

	<p id="email">{{$user->email}}</p>
	
	<p id="description">{{$user->description}}</p>

</div>

<!--below is for housing the users' badges-->
<div>

	<h4>Badges</h4>

	<hr/>

	{{  Html::image('img/trophy.png','alt',array('width'=>60, 'height'=>60))  }}

	{{  Html::image('img/ribbon.png','alt',array('width'=>60, 'height'=>60))  }}

	{{  Html::image('img/ribbon.png','alt',array('width'=>60, 'height'=>60))  }}

	{{  Html::image('img/trophy.png','alt',array('width'=>60, 'height'=>60))  }}

	{{  Html::image('img/ribbon.png','alt',array('width'=>60, 'height'=>60))  }}

</div>
