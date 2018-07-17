


<div class="form-group has-feedback">
    <label for="tag" class="col-md-3 control-label">动态标签</label>
    <div class="col-md-6">
        <input type="text" class="form-control" required name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
    <span class="form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <label for="tag" class="col-md-3 control-label">排序(越小越靠前)</label>
    <div class="col-md-6">
        <input type="number" class="form-control" required name="sort" id="tag" value="{{ $sort }}">
    </div>
    <span class="form-control-feedback"></span>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">状态</label>
    <div class="radio">
        &nbsp;&nbsp;&nbsp;
        <label>
            <input type="radio" name="status" id="optionsRadios1" value="1" checked="">
            显示
        </label>
        &nbsp;&nbsp;&nbsp;
        <label>
            <input type="radio" name="status" id="optionsRadios2" value="0" @if($status=='0') checked="" @endif>
            隐藏
        </label>
    </div>
</div>

