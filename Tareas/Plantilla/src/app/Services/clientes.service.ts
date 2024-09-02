import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Icliente } from '../Interfaces/icliente';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClienteService {

  apiurl = 'http://localhost/SextoVirtual/Tareas/CRUD_tienda/controllers/clientes.controller.php?op=';
  prove:Icliente[] = [];
  constructor(private lector: HttpClient) { }

  todos():Observable<Icliente[]>{
    return this.lector.get<Icliente[]>(this.apiurl + 'todos');
  }

  uno(idClientes:number):Observable<Icliente>{
    const formulario = new FormData();
    formulario.append('idClientes', idClientes.toString());
    return this.lector.post<Icliente>(this.apiurl + 'uno',formulario)

  }

  eliminar(idClientes:number):Observable<number>{
    const formulario = new FormData();
    formulario.append('idClientes', idClientes.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar',formulario)

  }

  insertar(cliente: Icliente):Observable<string>{

    const formulario = new FormData();

    formulario.append('Nombres', cliente.Nombres);
    formulario.append('Direccion', cliente.Direccion);
    formulario.append('Telefono', cliente.Telefono);
    formulario.append('Cedula', cliente.Cedula);
    formulario.append('Correo', cliente.Correo);

    return this.lector.post<string>(this.apiurl + 'insertar', formulario);
  }

  actualizar(cliente: Icliente):Observable<string>{

    const formulario = new FormData();
    formulario.append('idClientes', cliente.idClientes.toString());
    formulario.append('Nombres', cliente.Nombres);
    formulario.append('Direccion', cliente.Direccion);
    formulario.append('Telefono', cliente.Telefono);
    formulario.append('Cedula', cliente.Cedula);
    formulario.append('Correo', cliente.Correo);

    return this.lector.post<string>(this.apiurl + 'actualizar', formulario);
  }

}