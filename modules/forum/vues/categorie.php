<tr>
    <td><img src="./images/message.gif" alt="message" /></td>
    
    <td class="titre">
        <strong><a href="./voirforum.php?f='.$data['forum_id'].'"><?php echo stripslashes(htmlspecialchars($data['forum_nom'])); ?></a></strong>
    <br /><?php nl2br(stripslashes(htmlspecialchars($data['forum_description']))) ?>
    </td>
    
    <td class="nombresujets"><?php $data['forum_sujet'] ?></td>
    
    <td class="nombremessages"><?php $data['forum_message'] ?></td>
