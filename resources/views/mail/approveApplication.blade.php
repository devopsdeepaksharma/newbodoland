Hi {{ $user->name }},
@if($user->status == "A")
Your Application approved 
@else 
Your Application rejected  
@endif  