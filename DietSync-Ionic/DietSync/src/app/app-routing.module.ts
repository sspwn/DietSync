import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'folder/Inbox',
    pathMatch: 'full'
  },
  {
    path: 'folder/:id',
    loadChildren: () => import('./folder/folder.module').then( m => m.FolderPageModule)
  },
  {
    path: 'registrar-dieta',
    loadChildren: () => import('./paginas/registrar-dieta/registrar-dieta.module').then( m => m.RegistrarDietaPageModule)
  },
  {
    path: 'registrar-treino',
    loadChildren: () => import('./paginas/registrar-treino/registrar-treino.module').then( m => m.RegistrarTreinoPageModule)
  },
  {
    path: 'receitas',
    loadChildren: () => import('./paginas/receitas/receitas.module').then( m => m.ReceitasPageModule)
  },
  {
    path: 'evolucao',
    loadChildren: () => import('./paginas/evolucao/evolucao.module').then( m => m.EvolucaoPageModule)
  },
  {
    path: 'config',
    loadChildren: () => import('./paginas/config/config.module').then( m => m.ConfigPageModule)
  },
  {
    path: 'dicas',
    loadChildren: () => import('./paginas/dicas/dicas.module').then( m => m.DicasPageModule)
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
