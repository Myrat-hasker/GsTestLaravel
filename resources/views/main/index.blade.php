<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
    @if($alert = session()->pull('alert'))
    <div class="success">{{$alert}}</div>
    @endif
        <div class="card">
                <span class="title">Экспорт данных в GS</span>
                <form action="{{ route('gs.store')}}" method="post" novalidate>
                    @csrf
                
                    <div class="lbl">
                        <label for="name">Имя:</label>
                        <input type="text" id="name" name="name" placeholder="Введите имя" autofocus>
                    </div> 
                        @if($errors->has('name')) 
                            @foreach($errors->get('name') as $err)
                                <div class="errors">{{$err}}</div>
                            @endforeach
                        @endif
                    <div class="lbl">
                        <label for="mobile_number">Тел.:</label>
                        <input type="tel" id="mobile_number" name="mobile_number" placeholder="+7(000)000-00-00">   
                    </div>
  
                        @if($errors->has('mobile_number')) 
                            @foreach($errors->get('mobile_number') as $err)
                                <div class="errors">{{$err}}</div>
                            @endforeach
                        @endif
                    <div class="lbl">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Введите почту" >
                    </div>
  
                        @if($errors->has('email')) 
                            @foreach($errors->get('email') as $err)
                                <div class="errors">{{$err}}</div>
                            @endforeach
                        @endif
                    <button type="submit">Отправить</button>
                </form>
        </div>
        <script src="/js/inputmask.min.js"></script>
        <script src='/js/main.js'></script>
</body>
</html>