<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %><div class="element__content">$Content</div><% end_if %>

<% if $Files %>
    <div class="row element__links__list">
        <div class="col-md-12">
            <ul class="list-group">
                <% loop $Files %>
                    <a href="$File.URL" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 class="mb-1">
                                <i class="bi
                                    <% if $File.Extension == pdf %> bi-file-pdf
                                    <% else_if $File.Extension == doc || $File.Extension == docx %> filetype-docx
                                    <% else_if $File.Extension == xls || $File.Extension == xlsx %> filetype-xlsx
                                    <% else_if $File.Extension == ppt || $File.Extension == pptx %> filetype-pptx
                                    <% else %> bi-cloud-download<% end_if %>"></i>
                                $Title
                            </h4>
                            <small>$LastEdited.Ago</small>
                        </div>
                        $Content
                        <small>$File.Size - $File.Extension.UpperCase</small>
                    </a>
                <% end_loop %>
            </ul>
        </div>
    </div>
<% end_if %>
