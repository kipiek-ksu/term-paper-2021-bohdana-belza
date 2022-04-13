program L_9_1;
var q,f:text; i:integer;
a:string;
begin
assign(q,'q.txt');
assign(f,'f.txt');
 rewrite(f);
 write('vvedite text');
 repeat
 readln(a);
 writeln(f,a);
 until a[length(a)]='.';
 close(f);
 reset(f);
 rewrite(q);
 while not(eof(f)) do begin readln(f,a);  for i:=1 to length(a) do
 if a[i]=a[i+1] then writeln(q,a[i]+a[i+1]);
end;
 close(f);
 close(q);  reset(q);
 while not(eof(q)) do begin
 readln(q,a);
 writeln(a);
end;
end.


