program z19;
var a,b,S,K:real;
procedure koren(a,b:real; var K:real);
begin
  read(a,b);
  K:=sqrt(a)+sqrt(b);
end;
BEGIN
  koren(a,b,S);
  S:=sqrt(K);
  write(K:3:4);
end.
