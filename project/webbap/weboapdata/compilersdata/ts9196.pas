program masivu4;
type masiv=array[1..100, 1..100] of real;

var m:integer;
    c:masiv;

procedure vvod(var p:masiv);
var i,j:byte;
begin
   for i:=1 to m do
     for j:=1 to m do
      read(p[i,j])
end;

procedure interpr;
var i,j:byte;
begin
   for i:=1 to m do
     for j:=i to m do
       c[i,j]:=0;

end;

procedure print;
var i,j:byte;
begin
   for i:=1 to m do
     begin
       for j:=1 to m do
       write(c[i,j]:0:1,' ');
       write;     end;
end;

begin
   read(m);
   vvod(c);
   interpr;
   print;

end.