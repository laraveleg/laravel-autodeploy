<style>
    #git_id{
        position: fixed;
        bottom: 0px;
        left: 0px;
        background: #333;
        border-radius: 0px 5px 0px 0px;
        color: #fff;
        font-size: 13px;
        padding: 5px 15px;
    }
</style>

<div id="git_id" title="{{ $last_commit_time }}">Last commit: {{ $last_commit }} - Branch: {{ $current_branch }}</div>