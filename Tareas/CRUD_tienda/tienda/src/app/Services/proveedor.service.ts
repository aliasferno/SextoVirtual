import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Iproveedor } from '../Interfaces/iproveedor';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {

  apiurl = 'http://localhost/SextoVirtual/Tareas/CRUD_tienda/controllers/proveedores.controller.php?op=';
  prove:Iproveedor[] = [];
  constructor(private lector: HttpClient) { }

  todos():Observable<Iproveedor[]>{
    return this.lector.get<Iproveedor[]>(this.apiurl + 'todos');
  }

  eliminar(idProveedores:number):Observable<number>{
    const formulario = new FormData();
    formulario.append('idProveedores', idProveedores.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar',formulario)

}
}
