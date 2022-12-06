<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %><div class="element__content">$Content</div><% end_if %>

<% if $Files %>
    <div class="row element__links__list">
        <ul class="list-group">
            <% loop $Files %>
                <li class="list-group-item"><a href="$File.URL"><% if $Title %>$Title<% else %>$File.Title<% end_if %></a><br /><span>$File.Size $File.Extension.UpperCase</span></li>
            <% end_loop %>
        </ul>
    </div>
<% end_if %>
