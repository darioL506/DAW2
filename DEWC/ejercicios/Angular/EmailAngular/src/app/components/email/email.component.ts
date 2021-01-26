import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-email',
  templateUrl: './email.component.html',
  styleUrls: ['./email.component.scss']
})
export class EmailComponent implements OnInit {

  correo: any;

  constructor() { 
    this.correo = {
      titulo: "Titulo del email",
      cuerpo: "Cuerpo del email",
      emisor: "soyemisor@gmail.com",
      destinatario: 'correoejemplo@gmail.com'
    }
  }

  ngOnInit(): void {
    
  }

}
