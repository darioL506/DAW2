import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-lista-correos',
  templateUrl: './lista-correos.component.html',
  styleUrls: ['./lista-correos.component.scss'],
})
export class ListaCorreosComponent implements OnInit {
  correos: any[];
  responder: boolean;

  checked: String;

  constructor() {
    const correo1 = {
      titulo: 'Titulo del email',
      cuerpo:
        'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.',
      emisor: 'soyemisor@gmail.com',
      destinatario: 'correoejemplo@gmail.com',
      leido: true,
    };
    const correo2 = {
      titulo: 'Titulo del email2',
      cuerpo: 'Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.',
      emisor: 'soyemisor2@gmail.com',
      destinatario: 'correoejemplo2@gmail.com',
      leido: false,
    };
    this.correos = [];
    this.correos.push(correo1);
    this.correos.push(correo2);
  }

  ngOnInit(): void {}

  clickResponder(correo) {
    correo.responder = !correo.responder;
  }

  mensajeRecibido(correo){
    correo.responder=false;
  }
}
