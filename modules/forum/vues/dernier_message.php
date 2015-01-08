    <td class="derniermessage">
    
         <?php date('H\hi \l\e d/M/Y',$data['message_date'])?><br />
         <a href="./voirprofil.php?m='.stripslashes(htmlspecialchars($data['utilisateurs.id'])).'&amp;action=consulter"><?php $data['utilisateurs.pseudo'] ?></a>
         <a href="./voirtopic.php?t='.$data['sujet_id'].'&amp;page='.$page.'#p_'.$data['message_id'].'">
         <img src="./images/go.gif" alt="go" /></a>
    </td>
</tr>