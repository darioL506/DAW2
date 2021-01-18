import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CorreoService } from 'src/app/services/correo.service';
import { GmailService } from 'src/app/services/gmail.service';
import { trigger, state, transition, style, animate } from '@angular/animations';
import { MatTableDataSource } from '@angular/material/table';

@Component({
  selector: 'app-lista-correos',
  templateUrl: './lista-correos.component.html',
  styleUrls: ['./lista-correos.component.scss'],
  animations: [
    trigger('detailExpand', [
      state('collapsed', style({height: '0px', minHeight: '0'})),
      state('expanded', style({height: '*'})),
      transition('expanded <=> collapsed', animate('225ms cubic-bezier(0.4, 0.0, 0.2, 1)')),
    ]),
  ]
})
export class ListaCorreosComponent implements OnInit {

  correos: any[];
  columnsToDisplay: string[] = ['Emisor', 'Asunto', 'Acciones'];
  displayedColumns: string[] = ['emisor', 'titulo', 'id'];
  dataSource = new MatTableDataSource<any>();
  expandedElement: any | null;

  constructor(private gmail: GmailService, private router: Router, private correoService: CorreoService) {
    this.correos = [];
  }

  ngOnInit() {
    this.getRecibidos();
  }

  clickResponder(correo) {
    correo.responder = !correo.responder;
  }

  accionRespuestaRapida(correo) {
    correo.responder = false;
  }

  getRecibidos() {
    /**Nos suscribimos al observable */
    this.gmail.getRecibidos().subscribe(
      (response) => {
        const mensajes = response.messages;
        
        mensajes.forEach(element => {
          this.getMensaje(element.id);
        });
      },
      (error) => this.error(error)
    );
  }

  getMensaje(id: string){
    /**Nos suscribimos al observable */
    this.gmail.getMessage(id).subscribe(
      (response) => {
        console.log(response);
        const emisor = response.payload.headers.find(e => e.name === "From");
        const subject = response.payload.headers.find(e => e.name === "Subject");

        const mensage = {
          id: response.id,
          cuerpo: response.snippet,
          emisor: emisor? emisor.value : undefined,
          titulo: subject? subject.value : undefined,
        };
        this.dataSource.data.push(mensage);
        this.dataSource._updateChangeSubscription();
      },
      (error) => this.error(error)
    );
  }

  error(error){
    console.warn("ERROR");
  }

  verDetalle(correo){
    this.correoService.setCorreo(correo);
    this.router.navigate(['/mail']);
  }

}