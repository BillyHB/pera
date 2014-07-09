alertify.set({ labels: {
                ok     : "Aceptar",
                cancel : "Cancelar"
             }});

function mensaje_error(msg){   
	alertify.error("<div class='icon_msg'><img src=\"/bundles/uespera/img/msg_error.png\"></div><div class=\"msg\">"+msg+"</div>");
}

function mensaje_exito(msg){   
 	alertify.error("<div class='icon_msg'><img src=\"/bundles/uespera/img/msg_exito.png\"></div><div class=\"msg\">"+msg+"</div>");
}    

function mensaje_info(msg){   
    alertify.error("<div class='icon_msg'><img src=\"/bundles/uespera/img/msg_alerta.png\"></div><div class=\"msg\">"+msg+"</div>");
}


