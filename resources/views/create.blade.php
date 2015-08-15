    <h1 class="form-title">добавить заведение</h1>

    {!! Form::open(['url' => 'locations']) !!}

      {!!  Form::text('name', null, ['class' => 'form-name', 'placeholder' => 'введите название'])!!}
      {!!  Form::label('title', 'Тип заведения') !!}
      {!!  Form::select('type', array(
          'cafe' => 'Кафе',
          'eatery' => 'Столовая',
          'restaurant' => 'Ресторан',
          'coffee' => 'Кофейня',
          'other' => 'Другое'), 'cafe') !!}
      {!!  Form::text('time', null, ['class' => 'form-time', 'placeholder' => 'время работы'])!!}
      {!!  Form::label('title', 'Представлена еда') !!}
      {!!  Form::checkbox('specification', 'vegetarian') !!}
      {!!  Form::label('title', 'Вегетарианская') !!}
      {!!  Form::checkbox('specification', 'vegan') !!}
      {!!  Form::label('title', 'Веганская') !!}
      {!!  Form::radio('rating', '1')  !!}
      {!!  Form::radio('rating', '2')  !!}
      {!!  Form::radio('rating', '3')  !!}
      {!!  Form::radio('rating', '4')  !!}
      {!!  Form::radio('rating', '5')  !!}
    {!!  Form::textarea('name', null, ['class' => 'form-description', 'placeholder' => 'что в меню?'])!!}
    {!!  Form::submit('Сохранить', null, ['class' => 'form-submit'])!!}


    {!! Form::close() !!}
