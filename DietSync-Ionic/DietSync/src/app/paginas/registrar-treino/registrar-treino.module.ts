import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RegistrarTreinoPageRoutingModule } from './registrar-treino-routing.module';

import { RegistrarTreinoPage } from './registrar-treino.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RegistrarTreinoPageRoutingModule
  ],
  declarations: [RegistrarTreinoPage]
})
export class RegistrarTreinoPageModule {}
