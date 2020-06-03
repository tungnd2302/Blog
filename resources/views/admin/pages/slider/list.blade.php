@php
    use App\Helpers\Template as Template;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Slider info</th>
                <th class="column-title">Trạng thái</th>
                <th class="column-title">Tạo mới</th>
                <th class="column-title">Chỉnh sửa</th>
                <th class="column-title">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index         = $key + 1;
                            $class         = ($index % 2 == 0) ? "even" : 'odd';
                            $id            = $val['id'];
                            $name          = $val['name'];
                            $description   = $val['description'];
                            $link          = $val['link'];
                            $status        = Template::ShowItemStatus($controllerName,$id,$val['status']);
                            $createHistory = Template::ShowItemHistory($val['created_by'],$val['created']);
                            $modifyHistory = Template::ShowItemHistory($val['modified_by'],$val['modified']);
                            $img           = Template::ShowItemThumb($controllerName,$val['thumb'],$val['name']);
                            $listBtnAction = Template::ShowButtonAction($controllerName,$id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td class="">{{ $index }}</td>
                            <td width="40%">
                                <p><strong>Name: </strong> {{ $name }}</p>  
                                <p><strong>Description: </strong> {{ $description }}</p>  
                                <p><strong>Link: </strong> {{ $link }}</p> 
                                <p>{!! $img  !!}</p> 
                            </td>
                            <td>
                                {!! $status !!}
                            </td>
                            <td>
                                {!! $createHistory !!}
                            </td>
                            <td>
                                {!! $modifyHistory !!}
                            </td>
                            <td class="last">
                                {!! $listBtnAction !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty',['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>