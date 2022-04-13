Program dob_dva_dlin_chisla_markin;
 var A,B,R:real; TimeT:integer;
  begin
   TimeT:=GetTickCount;
   read(A,B);
   R:=A*B;
   if GetTickCount-TimeT>5000 then write('Код выполнялся дольше 5 сек');
   if GetTickCount-TimeT>5000 then write(R);
  end.