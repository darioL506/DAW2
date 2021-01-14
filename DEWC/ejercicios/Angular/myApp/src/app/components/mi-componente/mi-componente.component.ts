import { Component } from '@angular/core';

@Component({
  selector: 'mi-componente',
  templateUrl: './mi-componente.component.html'
})
export class MiComponente {
  
  public titulo: String;
  public comentario: String;
  public year: number;

  constructor(){
      console.log("Componente creado");
  }
}
