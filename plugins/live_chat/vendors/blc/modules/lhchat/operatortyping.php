<?php

if (is_numeric($Params['user_parameters']['chat_id']))
{
    $chat = erLhcoreClassChat::getSession()->load( 'erLhcoreClassModelChat', $Params['user_parameters']['chat_id']);

    if ( erLhcoreClassChat::hasAccessToRead($chat) )
    {
        if ( $Params['user_parameters']['status'] == 'true' ) {
            $chat->operator_typing = time();
            $chat->operator_typing_id = $currentUser->getUserID();
        } else {
            $chat->operator_typing = 0;
            $chat->operator_typing_id = 0;
        }
                
        erLhcoreClassChat::getSession()->update($chat);
    }
}

echo json_encode(array());
exit;
?>