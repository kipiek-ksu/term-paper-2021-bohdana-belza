  Program Chislo;
  var A,R,a1,a2,a3,a4:integer;
  begin
  read(A);
  begin
  a1:=A div 1000;
  a2:=(A div 100)mod 10;
  a3:=(A mod 100) div 10;
  a4:=A mod 10;
  R:=a4*1000+a3*100+a2*10+a1;
  write(R);
end.