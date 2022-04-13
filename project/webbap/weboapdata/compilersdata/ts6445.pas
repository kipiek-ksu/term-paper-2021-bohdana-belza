program n8;
type mass=array[1..100] of integer;
Var n,i,k,d,l:integer;a:mass;s:string;o1,o2:byte;
procedure sort(var a:mass );
var i,j,g,c,o:integer; f:boolean;
  begin
  g:=2;L:=0;
   while g<=n do
   begin
   i:=a[g];
   j:=g-1;
   f:=true;
   while((j>0)and(a[j]>i)) do
   begin
   f:=false;
   c:=a[j];
   a[j]:=a[j+1];
   a[j+1]:=c;
   j:=j-1;
   o2:=o2+1;
   end;
   if f=false then begin
   for i:=1 to n do begin
   write(a[i],); end;if f=false then writeln;end
   else l:=l+1;
   g:=g+1;
   end;
   o1:=g-2-l;
  end;
  procedure input(var a:mass);
  var i:word;
  begin
   for i:=1 to n do begin
   read(a[i]); end;
  end;
  procedure output(a:mass);
  var i:word;
  begin
  writeln(o2);
  writeln(o1);
   for i:=1 to n do begin
   write(a[i],); end;
  end;
begin
 Readln (n);
 input(a);
 sort (a);
 output(a);
end.