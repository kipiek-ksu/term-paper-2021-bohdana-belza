program p17;
 type Point=^item;
      item=record
           inf:integer;
           next:point;
           end;
 var F,L,g:point;n,x,z,i:integer;
 procedure inslist(var l:point; x:integer);
  var p:point;
   begin
    new(p);
    p^.inf:=x;
    l^.next:=p;
    p^.next:=nil;
    l:=p;
   end;
 function del(var F:point):integer;
  var y:point;
   begin
    y:=F;
    F:=F^.next;
    del:=y^.inf;
    dispose(y);
   end;
 procedure vuvod(F:point);
  var x:point;
   begin
    x:=F;
    while x<>nil do
     begin
      write(x^.inf);
      x:=x^.next;
     end;
    end;
 begin
  read(n);
  F:=nil;
  L:=nil;
  new(g);
  read(x);
  F:=g;
  L:=g;
  F^.inf:=x;
  for i:=1 to (n-1) do
  begin
   read(x);
   inslist(l,x);
  end;
  z:=del(F);
  vuvod(F);
  writeln(' ',z);
  end.
