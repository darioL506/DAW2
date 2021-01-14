import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AvisosService } from 'src/app/services/avisos.service';

@Component({
  selector: 'app-nuevo-correo',
  templateUrl: './nuevo-correo.component.html',
  styleUrls: ['./nuevo-correo.component.scss']
})
export class NuevoCorreoComponent implements OnInit {

  nuevoCorreo: FormGroup;
  submited = false;
  @Input() correo: any;

  @Output() hijoAvisando:
    EventEmitter<any>= new EventEmitter();

  constructor(private formBuilder: FormBuilder, public servicioAvisos:AvisosService) { }

  ngOnInit() {
    this.nuevoCorreo = this.formBuilder.group({
      titulo: ['',[Validators.required, Validators.minLength(3)]],
      cuerpo: ['',[Validators.required, Validators.minLength(10)]],
      destinatario: ['',[Validators.required, Validators.email]]
    });

    if(this.correo != undefined) {
      this.nuevoCorreo.patchValue({
        titulo: 'Re '+this.correo.titulo,
        destinatario: this.correo.emisor
      });
    }
  }

  get formulario() { return this.nuevoCorreo.controls}

  onSubmit() {
    this.submited = true;
    if(this.nuevoCorreo.invalid) {
      return;
    }

    let correo = this.nuevoCorreo.value;
    correo.leido = false;
    correo.emisor = "correoejemplo3@gmail.com";
    
    this.onReset();
    this.servicioAvisos.showMessage(`Correo enviado a ${correo.emisor}`);
  }

  onReset() {
    this.submited = false;
    this.nuevoCorreo.reset();
    this.hijoAvisando.emit();        
  }

  cancel() {
    this.onReset();
    this.servicioAvisos.showMessage("Envio cancelado");
  };
  
}
