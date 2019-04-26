<li>
    <div>{{ $user->name }}（{{ ($user->is_admin) ? '管理者' : $user->getText('japanese') }}）</div>

    @component('components.btn_delete')
        @slot('table', 'users')
        @slot('id', $user->id)
    @endcomponent

    <div class="panel-group" id="sampleAccordion{{ $user->id }}">
        <div class="card">
            <h3 class="card-header">
                <a href="#AccordionCollapse{{ $user->id }}" data-toggle="collapse" data-parent="#sampleAccordion2" aria-expanded="false" class="btn-lg btn-primary font_color_wht txt_decoration_n">
                    編集
                </a>
            </h3>

            <div id="AccordionCollapse{{ $user->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="card-header">
                    @include('users._form_index_edit')
                </div>
            </div>
        </div>
    </div>
</li>
