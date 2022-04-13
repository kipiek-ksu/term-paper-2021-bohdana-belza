program z20;
type Point= ^Item;
     Item=record
     x: char;
     p: Point;
     end;
 var i,j,n,h: integer; a: array[1..100,1..2] of char;
  s: string;g:point;
  l,f: point;

 procedure deleted(var f:point);
   var Tmp: Point;c:char;i:integer;
   begin
    tmp:=f;
    f:=f^.p;
    dispose(tmp);
    c:=f^.x;
    for i:=1 to n do
     if a[i,1]=c then begin h:=i;break; end
   end;


 procedure Add(var F: Point; x: char);
   var g,j:Point; fg: boolean;i:integer;
   begin
   fg:=false;
    for i:=1 to n do
     if a[i,1]=x then begin fg:=true;h:=i;break;end;
     if fg then begin
          new(g);
          g^.p:=f;
          g^.x:=x;
          f:=g;
           end
       else
        begin
             if x=a[h,2] then deleted(f);
        end;
   end;
 procedure Out(F: Point);
   var t: Point;
   begin
     t:=F;
     while (t<>NIL) do
       begin
         write(t^.x, ' ');
         t:=t^.p;
       end;
   end;

  begin
       readln(N);
       for i:=1 to n do
        readln(a[i,1],a[i,2]);
        readln(s);
        new(g);
        g^.x:=s[1];
        g^.p:=nil;
        f:=g;
        for i:=1 to n do
     if a[i,1]=s[1] then begin h:=i;break; end;
         for i:=2 to length(s) do
            begin
              add(f,s[i]);
            end;

            if f=nil then writeln('correct') else writeln('incorrect');
       readln;

  end.
