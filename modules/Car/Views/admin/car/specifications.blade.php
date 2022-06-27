<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
<div class="panel">
    <div class="panel-title"><strong>{{__("Specifications")}}</strong></div>
    <div class="panel-body">
        <div class="form-group-item">
            <label class="control-label">{{__('Specifications List')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Name")}}</div>
                    <div class="col-md-6">{{__('Desc')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($row->specifications))
                    @foreach(json_decode($row->specifications) as $key => $item)
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="specifications[{{$key}}][name]" class="form-control" value="{{$item->name ?? ''}}" placeholder="{{__('Extra price name')}}">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="specifications[{{$key}}][desc]" class="form-control" placeholder="{{ __('Specifications Desc') }}">{{$item->desc}}</textarea>
                                </div>
                                <div class="col-md-1">
                                    @if(is_default_lang())
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                @if(is_default_lang())
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                @endif
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="specifications[__number__][name]" class="form-control" value="" placeholder="{{__('Specifications name')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="specifications[__number__][desc]" class="form-control" placeholder="{{ __('Specifications Desc') }}"></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
