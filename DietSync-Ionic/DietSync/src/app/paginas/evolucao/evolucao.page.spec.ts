import { ComponentFixture, TestBed } from '@angular/core/testing';
import { EvolucaoPage } from './evolucao.page';

describe('EvolucaoPage', () => {
  let component: EvolucaoPage;
  let fixture: ComponentFixture<EvolucaoPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(EvolucaoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
